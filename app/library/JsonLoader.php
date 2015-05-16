<?php

namespace Sehub\Libraries;

use Phalcon\Mvc\User\Component;

class JsonLoader extends Component
{
    public function fromFile($filename)
    {
        $file_contents = file_get_contents('../' . $this->config->application->dataDir . $filename);
        return json_decode($file_contents);
    }
}

