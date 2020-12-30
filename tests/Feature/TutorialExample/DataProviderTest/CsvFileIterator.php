<?php
/**
 * Copyright (c) 2020 OneCodeMonkey, Inc. All Rights Reserved.
 *
 * File: CsvFileIterator.php
 * User: OneCodeMonkey (https://github.com/OneCodeMonkey)
 * Date: 2020/12/30
 * Time: 16:44
 */

namespace Tests\Feature\TutorialExample\DataProviderTest;

class CsvFileIterator implements \Iterator
{
    protected $file;

    protected $key = 0;

    protected $current;

    public function __construct($file)
    {
        $this->file = fopen($file, 'r');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function rewind()
    {
        rewind($this->file);
        $this->current = fgetcsv($this->file);
        $this->key = 0;
    }

    public function valid()
    {
        return !feof($this->file);
    }

    public function key(): int
    {
        return $this->key;
    }

    public function current()
    {
        return $this->current;
    }

    public function next()
    {
        $this->current = fgetcsv($this->file);
        $this->key++;
    }
}