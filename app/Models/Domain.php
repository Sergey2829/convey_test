<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'domain'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function formatDomain(string $url): string
    {
        $url = trim($url, '/');
        $host = parse_url($url, PHP_URL_HOST);
        if (!$host) {
            $url = 'http://' . ltrim($url, '/');
            $host = parse_url($url, PHP_URL_HOST);
        }
        return preg_replace('/^www\./', '', $host);

    }

    public static function isValidDomain(string $url): bool
    {
        return self::query()->where('domain', self::formatDomain($url))->doesntExist();
    }

}
