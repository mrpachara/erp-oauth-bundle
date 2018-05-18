<?php

namespace Erp\Bundle\OauthBundle\Processor;

class ScopeProcessorRegistry
{
    /** @var array */
    protected $processorDatas;

    public function __construct()
    {
        $this->processorDatas = [];
    }

    public function addProcessor($processor, $method)
    {
        $this->processorDatas[] = [
            'processor' => $processor,
            'method' => $method,
        ];
    }

    public function process(string $scope)
    {
        foreach ($this->processorDatas as $processorData) {
            call_user_func_array([$processorData['processor'], $processorData['method']], [$scope]);
        }
    }
}
