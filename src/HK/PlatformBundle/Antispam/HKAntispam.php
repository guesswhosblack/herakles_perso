<?php
// src/HK/PlatformBundle/Antispam/HKAntispam.php

namespace HK\PlatformBundle\Antispam;

class HKAntispam
{  

    public function isSpam($text)
    {
      return strlen($text) <50;
    }

}
