<?php

namespace App\Training;

enum TrainingLevel: string
{
    case BEGINNER = 'beginner';
    case INTERMEDIATE = 'intermediate';
    case ADVANCED = 'advanced';
    public function values(): array
    {
        return [
            self::BEGINNER,
            self::INTERMEDIATE,
            self::ADVANCED
        ];
    }

}
