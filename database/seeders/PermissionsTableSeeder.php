<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'qand_a_create',
            ],
            [
                'id'    => 18,
                'title' => 'qand_a_edit',
            ],
            [
                'id'    => 19,
                'title' => 'qand_a_show',
            ],
            [
                'id'    => 20,
                'title' => 'qand_a_delete',
            ],
            [
                'id'    => 21,
                'title' => 'qand_a_access',
            ],
            [
                'id'    => 22,
                'title' => 'cooperation_show',
            ],
            [
                'id'    => 23,
                'title' => 'cooperation_delete',
            ],
            [
                'id'    => 24,
                'title' => 'cooperation_access',
            ],
            [
                'id'    => 25,
                'title' => 'country_create',
            ],
            [
                'id'    => 26,
                'title' => 'country_edit',
            ],
            [
                'id'    => 27,
                'title' => 'country_show',
            ],
            [
                'id'    => 28,
                'title' => 'country_delete',
            ],
            [
                'id'    => 29,
                'title' => 'country_access',
            ],
            [
                'id'    => 30,
                'title' => 'programm_create',
            ],
            [
                'id'    => 31,
                'title' => 'programm_edit',
            ],
            [
                'id'    => 32,
                'title' => 'programm_show',
            ],
            [
                'id'    => 33,
                'title' => 'programm_delete',
            ],
            [
                'id'    => 34,
                'title' => 'programm_access',
            ],
            [
                'id'    => 35,
                'title' => 'direction_create',
            ],
            [
                'id'    => 36,
                'title' => 'direction_edit',
            ],
            [
                'id'    => 37,
                'title' => 'direction_show',
            ],
            [
                'id'    => 38,
                'title' => 'direction_delete',
            ],
            [
                'id'    => 39,
                'title' => 'direction_access',
            ],
            [
                'id'    => 40,
                'title' => 'university_create',
            ],
            [
                'id'    => 41,
                'title' => 'university_edit',
            ],
            [
                'id'    => 42,
                'title' => 'university_show',
            ],
            [
                'id'    => 43,
                'title' => 'university_delete',
            ],
            [
                'id'    => 44,
                'title' => 'university_access',
            ],
            [
                'id'    => 45,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 46,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 47,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 48,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 49,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 50,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 51,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 52,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 53,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 54,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 55,
                'title' => 'document_show',
            ],
            [
                'id'    => 56,
                'title' => 'document_delete',
            ],
            [
                'id'    => 57,
                'title' => 'document_access',
            ],
            [
                'id'    => 58,
                'title' => 'header_edit',
            ],
            [
                'id'    => 59,
                'title' => 'header_show',
            ],
            [
                'id'    => 60,
                'title' => 'header_access',
            ],
            [
                'id'    => 61,
                'title' => 'contact_create',
            ],
            [
                'id'    => 62,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 63,
                'title' => 'contact_show',
            ],
            [
                'id'    => 64,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 65,
                'title' => 'contact_access',
            ],
            [
                'id'    => 66,
                'title' => 'about_create',
            ],
            [
                'id'    => 67,
                'title' => 'about_edit',
            ],
            [
                'id'    => 68,
                'title' => 'about_show',
            ],
            [
                'id'    => 69,
                'title' => 'about_delete',
            ],
            [
                'id'    => 70,
                'title' => 'about_access',
            ],
            [
                'id'    => 71,
                'title' => 'news_create',
            ],
            [
                'id'    => 72,
                'title' => 'news_edit',
            ],
            [
                'id'    => 73,
                'title' => 'news_show',
            ],
            [
                'id'    => 74,
                'title' => 'news_delete',
            ],
            [
                'id'    => 75,
                'title' => 'news_access',
            ],
            [
                'id'    => 76,
                'title' => 'branch_create',
            ],
            [
                'id'    => 77,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 78,
                'title' => 'branch_show',
            ],
            [
                'id'    => 79,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 80,
                'title' => 'branch_access',
            ],
            [
                'id'    => 81,
                'title' => 'team_create',
            ],
            [
                'id'    => 82,
                'title' => 'team_edit',
            ],
            [
                'id'    => 83,
                'title' => 'team_show',
            ],
            [
                'id'    => 84,
                'title' => 'team_delete',
            ],
            [
                'id'    => 85,
                'title' => 'team_access',
            ],
            [
                'id'    => 86,
                'title' => 'main_header_create',
            ],
            [
                'id'    => 87,
                'title' => 'main_header_edit',
            ],
            [
                'id'    => 88,
                'title' => 'main_header_show',
            ],
            [
                'id'    => 89,
                'title' => 'main_header_delete',
            ],
            [
                'id'    => 90,
                'title' => 'main_header_access',
            ],
            [
                'id'    => 91,
                'title' => 'application_show',
            ],
            [
                'id'    => 92,
                'title' => 'application_delete',
            ],
            [
                'id'    => 93,
                'title' => 'application_access',
            ],
            [
                'id'    => 94,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
