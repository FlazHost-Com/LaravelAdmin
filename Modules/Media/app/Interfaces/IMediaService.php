<?php

namespace Modules\Media\app\Interfaces;

interface IMediaService
{
    public function list(): array;

    public function upload(\Illuminate\Http\UploadedFile $file): array;

    public function delete(string $key): void;
}
