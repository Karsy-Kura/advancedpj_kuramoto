<?php

namespace App\Traits;

use SplFileObject;

trait CsvTrait
{
  private function getCsvFileFromFilePath(String $filePath)
  {
    if (is_null($filePath)) {
      return null;
    }

    $file = new SplFileObject($filePath);
    $file->setFlags(
      SplFileObject::READ_CSV |
        SplFileObject::READ_AHEAD |
        SplFileObject::SKIP_EMPTY |
        SplFileObject::DROP_NEW_LINE
    );

    return $file;
  }
}
