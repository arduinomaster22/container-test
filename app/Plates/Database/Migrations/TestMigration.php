<?php

namespace App\Plates\Database\Migrations;

use App\Plates\Database\MigrationInterface;

class TestMigration extends MigrationInterface
{
    public function up(): void
    {
        echo "Running up method of TestMigration\n";
    }

    public function down(): void
    {
        echo "Running down method of TestMigration\n";
    }
}
