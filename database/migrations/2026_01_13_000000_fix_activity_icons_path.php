<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update paths from storage/activities to img/activities
        DB::table('activities')->where('icon', 'like', 'storage/activities/%')->get()->each(function ($activity) {
            $newPath = str_replace('storage/activities/', 'img/activities/', $activity->icon);

            // Special case for Strength which seems to have a legacy name in DB
            if ($activity->name === 'Strength' && str_contains($newPath, 'OwUKW8RytssUmXKcYtHzamtdpOYnpRmp5WOImKN9.jpg')) {
                $newPath = 'img/activities/strength.png';
            }

            DB::table('activities')->where('id', $activity->id)->update(['icon' => $newPath]);
        });

        // Also handle cases where icon might be just 'activities/'
        DB::table('activities')->where('icon', 'like', 'activities/%')->get()->each(function ($activity) {
            $newPath = 'img/' . $activity->icon;
            DB::table('activities')->where('id', $activity->id)->update(['icon' => $newPath]);
        });

        // Final fallback for Strength if it's already in img/activities but has wrong name
        DB::table('activities')->where('name', 'Strength')
            ->where('icon', 'like', '%OwUKW8RytssUmXKcYtHzamtdpOYnpRmp5WOImKN9.jpg')
            ->update(['icon' => 'img/activities/strength.png']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert paths back to storage/activities (approximate)
        DB::table('activities')->where('icon', 'like', 'img/activities/%')->get()->each(function ($activity) {
            $newPath = str_replace('img/activities/', 'storage/activities/', $activity->icon);
            DB::table('activities')->where('id', $activity->id)->update(['icon' => $newPath]);
        });
    }
};
