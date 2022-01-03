<?php

namespace GrantHolle\UsernameGenerator;

use Illuminate\Support\Str;

class Username
{
    protected ?int $adjectives = null;
    protected ?int $nouns = null;
    protected ?int $digits = null;
    protected ?string $casing = null;

    public function withAdjectiveCount(int $count): static
    {
        $this->adjectives = $count;

        return $this;
    }

    public function withNounCount(int $count): static
    {
        $this->nouns = $count;

        return $this;
    }

    public function withDigitCount(int $digits): static
    {
        $this->digits = $digits;

        return $this;
    }

    public function withCasing(string $casing): static
    {
        $this->casing = $casing;

        return $this;
    }

    public function generate(): string
    {
        $pieces = array_merge(
            Adjective::make($this->adjectives),
            Noun::make($this->nouns)
        );
        $pieces[] = DigitGenerator::make($this->digits);

        return Str::of(implode(' ', $pieces))
            ->{$this->casing}();
    }

    public static function make(string $casing = null): string
    {
        return (new static)
            ->withAdjectiveCount(config('username-generator.adjectives'))
            ->withNounCount(config('username-generator.nouns'))
            ->withDigitCount(config('username-generator.digits'))
            ->withCasing($casing ?? config('username-generator.casing'))
            ->generate();
    }
}
