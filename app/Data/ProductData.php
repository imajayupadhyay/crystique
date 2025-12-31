<?php

namespace App\Data;

class ProductData
{
    /**
     * Get all products
     *
     * @return array
     */
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'amethyst-crystal',
                'name' => 'Amethyst Crystal',
                'category' => 'Crystals',
                'categorySlug' => 'crystals',
                'price' => 45.99,
                'originalPrice' => 59.99,
                'rating' => 4.8,
                'reviews' => 124,
                'image' => 'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
                    'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
                    'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'badge' => 'Best Seller',
                'description' => 'Experience the calming and protective energy of genuine Amethyst. This stunning purple crystal is known for its ability to enhance spiritual awareness, promote tranquility, and support meditation practices. Each piece is naturally formed and unique.',
            ],
            [
                'id' => 2,
                'slug' => 'rose-quartz-heart',
                'name' => 'Rose Quartz Heart',
                'category' => 'Crystals',
                'categorySlug' => 'crystals',
                'price' => 32.99,
                'rating' => 4.9,
                'reviews' => 89,
                'image' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=800&auto=format&fit=crop&q=60',
                    'https://images.unsplash.com/photo-1596637754862-54a81dc4a2d2?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'badge' => 'New',
                'description' => 'Rose Quartz is the stone of universal love. It restores trust and harmony in relationships, encouraging unconditional love. This heart-shaped crystal promotes self-love, friendship, and deep inner healing.',
            ],
            [
                'id' => 3,
                'slug' => 'rudraksha-mala',
                'name' => 'Rudraksha Mala',
                'category' => 'Jaap Mala',
                'categorySlug' => 'jaap-mala',
                'price' => 78.99,
                'rating' => 5.0,
                'reviews' => 156,
                'image' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'description' => 'Authentic Rudraksha Mala beads for meditation and prayer. Each bead is blessed and energized for spiritual growth and protection. Perfect for daily meditation practice.',
            ],
            [
                'id' => 4,
                'slug' => 'clear-quartz-point',
                'name' => 'Clear Quartz Point',
                'category' => 'Crystals',
                'categorySlug' => 'crystals',
                'price' => 28.99,
                'rating' => 4.7,
                'reviews' => 67,
                'image' => 'https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1518683374e22-b0d303cb8501?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'description' => 'Clear Quartz is known as the "master healer" and will amplify energy and thought. It absorbs, stores, releases and regulates energy and is excellent for unblocking it.',
            ],
            [
                'id' => 5,
                'slug' => 'tiger-eye-bracelet',
                'name' => 'Tiger Eye Bracelet',
                'category' => 'Jewelry',
                'categorySlug' => 'jewelry',
                'price' => 24.99,
                'rating' => 4.6,
                'reviews' => 92,
                'image' => 'https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1611652022419-a9419f74343a?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => false,
                'description' => 'Tiger Eye bracelet for protection and grounding. This powerful stone helps you to release fear and anxiety and aids harmony and balance.',
            ],
            [
                'id' => 6,
                'slug' => 'crystal-mala-beads',
                'name' => 'Crystal Mala Beads',
                'category' => 'Jaap Mala',
                'categorySlug' => 'jaap-mala',
                'price' => 89.99,
                'rating' => 4.8,
                'reviews' => 134,
                'image' => 'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'description' => 'Beautiful crystal mala beads for meditation and spiritual practice. Each bead is carefully selected for quality and energy.',
            ],
            [
                'id' => 7,
                'slug' => 'black-tourmaline',
                'name' => 'Black Tourmaline',
                'category' => 'Crystals',
                'categorySlug' => 'crystals',
                'price' => 36.99,
                'rating' => 4.7,
                'reviews' => 78,
                'image' => 'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1602173574767-37ac01994b2a?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'description' => 'Black Tourmaline is a powerful grounding stone that provides protection against negative energies and electromagnetic fields.',
            ],
            [
                'id' => 8,
                'slug' => 'selenite-wand',
                'name' => 'Selenite Wand',
                'category' => 'Crystals',
                'categorySlug' => 'crystals',
                'price' => 42.99,
                'rating' => 4.9,
                'reviews' => 103,
                'image' => 'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
                'images' => [
                    'https://images.unsplash.com/photo-1584990347449-39b03b2f6021?w=800&auto=format&fit=crop&q=60',
                ],
                'inStock' => true,
                'badge' => 'Popular',
                'description' => 'Selenite is a calming stone that instills deep peace and is excellent for meditation or spiritual work. It can be used to cleanse and charge other crystals.',
            ],
        ];
    }

    /**
     * Get a product by slug
     *
     * @param string $slug
     * @return array|null
     */
    public static function findBySlug(string $slug): ?array
    {
        $products = self::all();

        foreach ($products as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    /**
     * Get a product by ID
     *
     * @param int $id
     * @return array|null
     */
    public static function findById(int $id): ?array
    {
        $products = self::all();

        foreach ($products as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }

        return null;
    }

    /**
     * Get products by category
     *
     * @param string $category
     * @return array
     */
    public static function findByCategory(string $category): array
    {
        $products = self::all();

        return array_values(array_filter($products, function($product) use ($category) {
            return strtolower($product['category']) === strtolower($category)
                || $product['categorySlug'] === $category;
        }));
    }

    /**
     * Get related products (same category, different product)
     *
     * @param array $product
     * @param int $limit
     * @return array
     */
    public static function getRelatedProducts(array $product, int $limit = 4): array
    {
        $products = self::all();

        $related = array_values(array_filter($products, function($p) use ($product) {
            return $p['category'] === $product['category'] && $p['id'] !== $product['id'];
        }));

        return array_slice($related, 0, $limit);
    }

    /**
     * Get all unique categories
     *
     * @return array
     */
    public static function getCategories(): array
    {
        $products = self::all();
        $categories = [];

        foreach ($products as $product) {
            $categories[$product['categorySlug']] = $product['category'];
        }

        return $categories;
    }

    /**
     * Search products
     *
     * @param string $query
     * @return array
     */
    public static function search(string $query): array
    {
        $products = self::all();

        return array_values(array_filter($products, function($product) use ($query) {
            return stripos($product['name'], $query) !== false
                || stripos($product['description'], $query) !== false
                || stripos($product['category'], $query) !== false;
        }));
    }

    /**
     * Get featured products
     *
     * @param int $limit
     * @return array
     */
    public static function getFeatured(int $limit = 8): array
    {
        $products = self::all();

        // Get products with badges first, then by rating
        usort($products, function($a, $b) {
            if (isset($a['badge']) && !isset($b['badge'])) {
                return -1;
            }
            if (!isset($a['badge']) && isset($b['badge'])) {
                return 1;
            }
            return $b['rating'] <=> $a['rating'];
        });

        return array_slice($products, 0, $limit);
    }
}
