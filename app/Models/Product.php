<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Product extends Model {
        use HasFactory;
        protected $table = "products";
        protected $fillable = [
            "image",
            "name",
            "description",
            "price",
            "qty",
            "brand_id",
            "category_id"
        ];

        public function Category()
        {
            return $this->belongsTo(Category::class, "category_id");
        }

        public function Brand(){
            return $this->belongsTo(Brand::class, "brand_id", "id");
        }

        public function getImage(){
            if ($this->image){
                return asset("upload/".$this->image);
            }
            return asset("upload/default.png");
        }

    }
