<?php

namespace App\Application\Commands;

use App\Domains\ValueObjects\CategoryId;
use Illuminate\Http\UploadedFile;

class AddProductCase
{
    private CategoryId $categoryId;
    private string $name;
    private float $price;
    private string $description;
    private string $photo;
    private string $status;
    private UploadedFile $file;

    /**
     * Create a new class instance.
     */
    public function __construct(
        CategoryId   $categoryId,
        string       $name,
        string       $photo,
        string       $status,
        float        $price,
        UploadedFile $file
    )
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->price = $price;
        $this->photo = $photo;
        $this->status = $status;
        $this->file = $file;
    }

    /**
     * @return CategoryId
     */
    public function getCategoryId(): CategoryId
    {
        return $this->categoryId;
    }

    /**
     * @param CategoryId $categoryId
     */
    public function setCategoryId(CategoryId $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return AddProductCase
     */
    public function setPhoto(string $photo): AddProductCase
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return UploadedFile
     */
    public function getFile(): UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     * @return AddProductCase
     */
    public function setFile(UploadedFile $file): AddProductCase
    {
        $this->file = $file;
        return $this;
    }
}


