<?php

namespace App\Infrastructure\Database\Models;

use App\Domains\Entities\ProductEntity;
use App\Domains\ValueObjects\CategoryId;
use App\Domains\ValueObjects\Id;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property float $price
 * @property string $photo
 * @property string $status
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'photo',
        'status'
    ];

    public function toEntity(): ProductEntity
    {
        return new ProductEntity(
            categoryId: new CategoryId($this->category_id),
            name: $this->name,
            price: $this->price,
            photo: $this->photo,
            status: $this->status,
            id: new Id($this->id),
            category: $this->category->name
        );
    }

    public function toArray(): array
    {
        return [
            'categoryId' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'photo' => $this->photo,
            'status' => $this->status,
            'id' => $this->id,
            'category' => $this->category->name
        ];

    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
