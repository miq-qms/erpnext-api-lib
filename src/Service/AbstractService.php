<?php

namespace Miq\ErpnextApi\Service;

use Miq\ErpnextApi\Exception\ApiException;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractService
{
    protected static ?Serializer $_serializer = null;

    /**
     * Returns the base string for api access (e.g. /item or something else)
     *
     * @return string
     */
    abstract protected function getBaseRoute(): string;

    /**
     * Returns the entity name with namespace
     *
     * @return string
     */
    abstract protected function getEntity(): string;

    public string $baseUrl = 'http://localhost:8000';
    public string $proxy   = '';

    protected function getBaseUrl(): string {
        return $this->baseUrl;
    }

    /**
     * here u can possibly pass optional options to curl
     * e.g. disable ssl verify in case of letsencrypt
     *
     * @return array
     */
    protected function getCustomCurlOptions(): array {
        return [];
    }

    /**
     * Prepares curl request with some default connection data (can be overridden later)
     *
     * @param string $url
     * @return false|resource
     */
    private function curlInit(string $url)
    {
        $ch = curl_init($url);

        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
        //custom passed options from client
        foreach ($this->getCustomCurlOptions() as $option => $value) {
            if(!empty($option))
                curl_setopt($ch, $option, $value);
        }

        return $ch;
    }

    /**
     * Executes the curl request and handles response or throws an exception
     *
     * @param $resource
     * @return bool|string
     * @throws ApiException
     */
    private function curlExec($resource)
    {
        $result = curl_exec($resource);
        if(!$result) {
            $code = curl_getinfo($resource, CURLINFO_RESPONSE_CODE);
            throw new ApiException($result, $code);
        }

        return $result;
    }

    /**
     * returns an instance of the serializer and instanciate it once
     *
     * @return Serializer
     */
    protected function getSerializer(): Serializer
    {
        if (self::$_serializer === null || !self::$_serializer instanceof Serializer) {
            $encoders           = [new JsonEncoder()];
            $normalizers        = array(new PropertyNormalizer(), new DateTimeNormalizer());
            self::$_serializer  = new Serializer($normalizers, $encoders);
        }

        return self::$_serializer;
    }

    /**
     * @param string $payload
     * @return bool|string
     * @throws ApiException
     */
    protected function POST(string $payload)
    {
        $ch = $this->curlInit( $this->getBaseUrl().$this->getBaseRoute());
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_POST, true );
        return $this->curlExec($ch);
    }

    /**
     * @return array
     * @throws ApiException
     */
    protected function GET(): array
    {
        $ch             = $this->curlInit( $this->getBaseUrl().$this->getBaseRoute());
        $encoders       = [new JsonEncoder()];
        $normalizers    = array(new DateTimeNormalizer(), new ObjectNormalizer(null, null, null, new ReflectionExtractor()), new ArrayDenormalizer());
        $serializer     = new Serializer($normalizers, $encoders);

        return $serializer->deserialize($this->curlExec($ch), $this->getEntity().'[]', 'json');
    }

    /**
     * @param string $jsonContent
     * @return array
     */
    public function fromJson(string $jsonContent): array
    {
        //deserialization
        $encoders       = [new JsonEncoder()];
        $normalizers    = array(new DateTimeNormalizer(), new ObjectNormalizer(null, null, null, new ReflectionExtractor()), new ArrayDenormalizer());
        $serializer     = new Serializer($normalizers, $encoders);
        $data           = $serializer->deserialize($jsonContent, $this->getEntity().'[]', 'json');
        //if there is only one element, convert it to an "array" of elements
        if(!is_array($data)) {
            $data = [$data];
        }
        //return the array
        return $data;
    }

    /**
     * @param array $items
     * @return string
     */
    public function toJson(array $items): string
    {
        $encoders = [new JsonEncoder()];
        $normalizers = array(new PropertyNormalizer(), new DateTimeNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($items, 'json');
    }
}