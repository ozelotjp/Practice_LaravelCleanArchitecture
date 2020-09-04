<?php

namespace Package\UseCases\Todo\Store;

interface TodoStoreOutput
{
    public function handle(TodoStoreOutputData $output);
}
