<?php

namespace App;

enum IdeadStatus: string
{
    case Pending = 'pending';
    case inProgress = 'in_progress';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::inProgress => 'In Progress',
            self::Completed => 'Completed',
        };
    }
}
