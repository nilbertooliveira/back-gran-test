<?php

namespace App\Domains\Entities;

use App\Domains\ValueObjects\CategoryId;
use App\Domains\ValueObjects\Id;
use Illuminate\Http\UploadedFile;

class ProductEntity
{
    private CategoryId $categoryId;
    private string $name;
    private float $price;
    private ?string $category;
    private ?Id $id;
    private string $photo;
    private string $status;
    private ?UploadedFile $file;

    /**
     * @param CategoryId $categoryId
     * @param string $name
     * @param float $price
     * @param string $photo
     * @param string $status
     * @param Id|null $id
     * @param string|null $category
     * @param UploadedFile|null $file
     */
    public function __construct(
        CategoryId    $categoryId,
        string        $name,
        float         $price,
        string        $photo,
        string        $status,
        ?Id           $id = null,
        ?string       $category = null,
        ?UploadedFile $file = null
    )
    {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->id = $id;
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


    public function toArray(): array
    {
        return [
            'category_id' => $this->getCategoryId()->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'photo' => $this->getPhoto(),
            'status' => $this->getStatus(),
            'file' => $this->getFile()

        ];
    }

    /**
     * @return Id|null
     */
    public function getId(): ?Id
    {
        return $this->id;
    }

    /**
     * @param Id|null $id
     * @return ProductEntity
     */
    public function setId(?Id $id): ProductEntity
    {
        $this->id = $id;
        return $this;
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
     * @return ProductEntity
     */
    public function setPhoto(string $photo): ProductEntity
    {
        $this->photo = $photo;
        return $this;
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
     * @return ProductEntity
     */
    public function setStatus(string $status): ProductEntity
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     * @return ProductEntity
     */
    public function setCategory(?string $category): ProductEntity
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     * @return ProductEntity
     */
    public function setFile(?UploadedFile $file): ProductEntity
    {
        $this->file = $file;
        return $this;
    }
}
