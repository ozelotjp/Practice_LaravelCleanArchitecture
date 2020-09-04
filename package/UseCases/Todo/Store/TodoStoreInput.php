<?php

namespace Package\UseCases\Todo\Store;

interface TodoStoreInput
{
    public function handle(TodoStoreInputData $input);
}
