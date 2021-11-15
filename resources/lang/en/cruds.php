<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'region'                   => 'Region',
            'region_helper'            => ' ',
            'photo'                    => 'Photo',
            'photo_helper'             => ' ',
        ],
    ],
    'qandA' => [
        'title'          => 'QandA',
        'title_singular' => 'QandA',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'number'             => 'Number',
            'number_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'question_uz'        => 'Question Uz',
            'question_uz_helper' => ' ',
            'question_ru'        => 'Question Ru',
            'question_ru_helper' => ' ',
            'question_en'        => 'Question En',
            'question_en_helper' => ' ',
            'answer_uz'          => 'Answer Uz',
            'answer_uz_helper'   => ' ',
            'answer_ru'          => 'Answer Ru',
            'answer_ru_helper'   => ' ',
            'answer_en'          => 'Answer En',
            'answer_en_helper'   => ' ',
        ],
    ],
    'cooperation' => [
        'title'          => 'Cooperation',
        'title_singular' => 'Cooperation',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => ' ',
            'company_name'        => 'Company Name',
            'company_name_helper' => ' ',
            'position'            => 'Position',
            'position_helper'     => ' ',
            'address'             => 'Address',
            'address_helper'      => ' ',
            'message'             => 'Message',
            'message_helper'      => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'country' => [
        'title'          => 'Country',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'name_uz'             => 'Name Uz',
            'name_uz_helper'      => ' ',
            'name_ru'             => 'Name Ru',
            'name_ru_helper'      => ' ',
            'name_en'             => 'Name En',
            'name_en_helper'      => ' ',
            'image'               => 'Image',
            'image_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'country_logo'        => 'Country Logo',
            'country_logo_helper' => ' ',
        ],
    ],
    'programm' => [
        'title'          => 'Programm',
        'title_singular' => 'Programm',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_uz'           => 'Name Uz',
            'name_uz_helper'    => ' ',
            'name_ru'           => 'Name Ru',
            'name_ru_helper'    => ' ',
            'name_en'           => 'Name En',
            'name_en_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'direction' => [
        'title'          => 'Direction',
        'title_singular' => 'Direction',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name_uz'           => 'Name Uz',
            'name_uz_helper'    => ' ',
            'name_ru'           => 'Name Ru',
            'name_ru_helper'    => ' ',
            'name_en'           => 'Name En',
            'name_en_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'programm'          => 'Programm',
            'programm_helper'   => ' ',
        ],
    ],
    'university' => [
        'title'          => 'University',
        'title_singular' => 'University',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'country'                       => 'Country',
            'country_helper'                => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
            'short_description_uz'          => 'Short Description Uz',
            'short_description_uz_helper'   => ' ',
            'short_description_ru'          => 'Short Description Ru',
            'short_description_ru_helper'   => ' ',
            'short_description_en'          => 'Short Description En',
            'short_description_en_helper'   => ' ',
            'article_description_uz'        => 'Article Description Uz',
            'article_description_uz_helper' => ' ',
            'article_description_ru'        => 'Article Description Ru',
            'article_description_ru_helper' => ' ',
            'article_description_en'        => 'Article Description En',
            'article_description_en_helper' => ' ',
            'direction'                     => 'Direction',
            'direction_helper'              => ' ',
            'image'                         => 'Image',
            'image_helper'                  => ' ',
            'name_uz'                       => 'Name Uz',
            'name_uz_helper'                => ' ',
            'name_ru'                       => 'Name Ru',
            'name_ru_helper'                => ' ',
            'name_en'                       => 'Name En',
            'name_en_helper'                => ' ',
            'number'                        => 'Number',
            'number_helper'                 => ' ',
            'top'                           => 'Top',
            'top_helper'                    => ' ',
            'university_logo'               => 'University Logo',
            'university_logo_helper'        => ' ',
            'certificates'                  => 'Certificates',
            'certificates_helper'           => ' ',
            'price'                         => 'Price',
            'price_helper'                  => ' ',
            'ielts'                         => 'Ielts',
            'ielts_helper'                  => ' ',
        ],
    ],
    'gallery' => [
        'title'          => 'Gallery',
        'title_singular' => 'Gallery',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'image'                       => 'Image',
            'image_helper'                => ' ',
            'country'                     => 'Country',
            'country_helper'              => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'cover'                       => 'Cover',
            'cover_helper'                => ' ',
            'short_description_uz'        => 'Short Description Uz',
            'short_description_uz_helper' => ' ',
            'short_description_ru'        => 'Short Description Ru',
            'short_description_ru_helper' => ' ',
            'short_description_en'        => 'Short Description En',
            'short_description_en_helper' => ' ',
            'number'                      => 'Number',
            'number_helper'               => ' ',
        ],
    ],
    'testimonial' => [
        'title'          => 'Testimonial',
        'title_singular' => 'Testimonial',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'image'                => 'Image',
            'image_helper'         => ' ',
            'text_uz'              => 'Text Uz',
            'text_uz_helper'       => ' ',
            'text_ru'              => 'Text Ru',
            'text_ru_helper'       => ' ',
            'text_en'              => 'Text En',
            'text_en_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'occupation_uz'        => 'Occupation Uz',
            'occupation_uz_helper' => ' ',
            'occupation_ru'        => 'Occupation Ru',
            'occupation_ru_helper' => ' ',
            'occupation_en'        => 'Occupation En',
            'occupation_en_helper' => ' ',
            'number'               => 'Number',
            'number_helper'        => ' ',
        ],
    ],
    'document' => [
        'title'          => 'Document',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'user'                => 'User',
            'user_helper'         => ' ',
            'university'          => 'University',
            'university_helper'   => ' ',
            'passport'            => 'Passport',
            'passport_helper'     => ' ',
            'diploma'             => 'Diploma',
            'diploma_helper'      => ' ',
            'certificate'         => 'Certificate',
            'certificate_helper'  => ' ',
            'photo'               => 'Photo',
            'photo_helper'        => ' ',
            'direction'           => 'Direction',
            'direction_helper'    => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'certificates'        => 'Certificates',
            'certificates_helper' => ' ',
        ],
    ],
    'header' => [
        'title'          => 'Header',
        'title_singular' => 'Header',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'about_us'           => 'About Us',
            'about_us_helper'    => ' ',
            'gallery'            => 'Gallery',
            'gallery_helper'     => ' ',
            'news'               => 'News',
            'news_helper'        => ' ',
            'programs'           => 'Programs',
            'programs_helper'    => ' ',
            'faq'                => 'Faq',
            'faq_helper'         => ' ',
            'cooperation'        => 'Cooperation',
            'cooperation_helper' => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contact',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'phone_number'        => 'Phone Number',
            'phone_number_helper' => ' ',
            'address_uz'          => 'Address Uz',
            'address_uz_helper'   => ' ',
            'address_ru'          => 'Address Ru',
            'address_ru_helper'   => ' ',
            'address_en'          => 'Address En',
            'address_en_helper'   => ' ',
            'instagram'           => 'Instagram',
            'instagram_helper'    => ' ',
            'telegram'            => 'Telegram',
            'telegram_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'facebook'            => 'Facebook',
            'facebook_helper'     => ' ',
            'branch'              => 'Branch',
            'branch_helper'       => ' ',
            'type'                => 'Type',
            'type_helper'         => ' ',
        ],
    ],
    'about' => [
        'title'          => 'About',
        'title_singular' => 'About',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'decription_uz'         => 'Decription Uz',
            'decription_uz_helper'  => ' ',
            'description_ru'        => 'Description Ru',
            'description_ru_helper' => ' ',
            'description_en'        => 'Description En',
            'description_en_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'news' => [
        'title'          => 'News',
        'title_singular' => 'News',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'title_uz'                    => 'Title Uz',
            'title_uz_helper'             => ' ',
            'title_ru'                    => 'Title Ru',
            'title_ru_helper'             => ' ',
            'title_en'                    => 'Title En',
            'title_en_helper'             => ' ',
            'image'                       => 'Image',
            'image_helper'                => ' ',
            'short_description_uz'        => 'Short Description Uz',
            'short_description_uz_helper' => ' ',
            'short_description_ru'        => 'Short Description Ru',
            'short_description_ru_helper' => ' ',
            'article_uz'                  => 'Article Uz',
            'article_uz_helper'           => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'short_description_en'        => 'Short Description En',
            'short_description_en_helper' => ' ',
            'article_ru'                  => 'Article Ru',
            'article_ru_helper'           => ' ',
            'article_en'                  => 'Article En',
            'article_en_helper'           => ' ',
        ],
    ],
    'branch' => [
        'title'          => 'Branch',
        'title_singular' => 'Branch',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name_uz'                => 'Name Uz',
            'name_uz_helper'         => ' ',
            'name_ru'                => 'Name Ru',
            'name_ru_helper'         => ' ',
            'name_en'                => 'Name En',
            'name_en_helper'         => ' ',
            'address_uz'             => 'Address Uz',
            'address_uz_helper'      => ' ',
            'address_ru'             => 'Address Ru',
            'address_ru_helper'      => ' ',
            'address_en'             => 'Address En',
            'address_en_helper'      => ' ',
            'target_uz'              => 'Target Uz',
            'target_uz_helper'       => ' ',
            'target_ru'              => 'Target Ru',
            'target_ru_helper'       => ' ',
            'target_en'              => 'Target En',
            'target_en_helper'       => ' ',
            'working_days_from'          => 'Working Days From',
            'working_days_from_helper'   => ' ',
            'working_days_to'          => 'Working Days To',
            'working_days_to_helper'   => ' ',
            'working_hours_from'          => 'Working Hours From',
            'working_hours_from_helper'   => ' ',
            'working_hours_to'          => 'Working Hours To',
            'working_hours_to_helper'   => ' ',
            'google_map_link'        => 'Google Map Link',
            'google_map_link_helper' => ' ',
            'number'                 => 'Number',
            'number_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'region'                 => 'Region',
            'region_helper'          => ' ',
            'city'                   => 'City',
            'city_helper'            => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Team',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'full_name_uz'         => 'Full Name Uz',
            'full_name_uz_helper'  => ' ',
            'full_name_ru'         => 'Full Name Ru',
            'full_name_ru_helper'  => ' ',
            'full_name_en'         => 'Full Name En',
            'full_name_en_helper'  => ' ',
            'occupation_uz'        => 'Occupation Uz',
            'occupation_uz_helper' => ' ',
            'occupation_ru'        => 'Occupation Ru',
            'occupation_ru_helper' => ' ',
            'occupation_en'        => 'Occupation En',
            'occupation_en_helper' => ' ',
            'photo'                => 'Photo',
            'photo_helper'         => ' ',
            'number'               => 'Number',
            'number_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'mainHeader' => [
        'title'          => 'Main Header',
        'title_singular' => 'Main Header',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'slogan_uz'               => 'Slogan Uz',
            'slogan_uz_helper'        => ' ',
            'slogan_ru'               => 'Slogan Ru',
            'slogan_ru_helper'        => ' ',
            'slogan_en'               => 'Slogan En',
            'slogan_en_helper'        => ' ',
            'title_uz'                => 'Title Uz',
            'title_uz_helper'         => ' ',
            'title_ru'                => 'Title Ru',
            'title_ru_helper'         => ' ',
            'title_en'                => 'Title En',
            'title_en_helper'         => ' ',
            'background_image'        => 'Background Image',
            'background_image_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'application' => [
        'title'          => 'Application',
        'title_singular' => 'Application',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'user'                      => 'User',
            'user_helper'               => ' ',
            'region'                    => 'Region',
            'region_helper'             => ' ',
            'certificate_status'        => 'Certificate Status',
            'certificate_status_helper' => ' ',
            'message'                   => 'Message',
            'message_helper'            => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'certificates'              => 'Certificates',
            'certificates_helper'       => ' ',
        ],
    ],
    'aboutUs' => [
        'title'          => 'About Us',
        'title_singular' => 'About Us',
        'fields'         => [
            'id'                                     => 'ID',
            'id_helper'                              => ' ',
            'image'                                  => 'Image',
            'image_helper'                           => ' ',
            'success_students'                       => 'Success Students',
            'success_students_helper'                => ' ',
            'created_at'                             => 'Created at',
            'created_at_helper'                      => ' ',
            'updated_at'                             => 'Updated at',
            'updated_at_helper'                      => ' ',
            'deleted_at'                             => 'Deleted at',
            'deleted_at_helper'                      => ' ',
            'title_uz'                               => 'Title Uz',
            'title_uz_helper'                        => ' ',
            'title_ru'                               => 'Title Ru',
            'title_ru_helper'                        => ' ',
            'title_en'                               => 'Title En',
            'title_en_helper'                        => ' ',
            'short_description_uz'                   => 'Short Description Uz',
            'short_description_uz_helper'            => ' ',
            'short_description_ru'                   => 'Short Description Ru',
            'short_description_ru_helper'            => ' ',
            'short_description_en'                   => 'Short Description En',
            'short_description_en_helper'            => ' ',
            'advantages_uz'                          => 'Advantages Uz',
            'advantages_uz_helper'                   => ' ',
            'advantages_ru'                          => 'Advantages Ru',
            'advantages_ru_helper'                   => ' ',
            'advantages_en'                          => 'Advantages En',
            'advantages_en_helper'                   => ' ',
            'statistics_short_description_uz'        => 'Statistics Short Description Uz',
            'statistics_short_description_uz_helper' => ' ',
            'statistics_short_description_ru'        => 'Statistics Short Description Ru',
            'statistics_short_description_ru_helper' => ' ',
            'statistics_short_description_en'        => 'Statistics Short Description En',
            'statistics_short_description_en_helper' => ' ',
            'article_uz'                             => 'Article Uz',
            'article_uz_helper'                      => ' ',
            'article_ru'                             => 'Article Ru',
            'article_ru_helper'                      => ' ',
            'article_en'                             => 'Article En',
            'article_en_helper'                      => ' ',
            'footer_text_uz'                         => 'Footer Text Uz',
            'footer_text_uz_helper'                  => ' ',
            'footer_text_ru'                         => 'Footer Text Ru',
            'footer_text_ru_helper'                  => ' ',
            'footer_text_en'                         => 'Footer Text En',
            'footer_text_en_helper'                  => ' ',
        ],
    ],
    'cooperationOfferText' => [
        'title'          => 'Cooperation Offer Text',
        'title_singular' => 'Cooperation Offer Text',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'offer_uz'          => 'Offer Uz',
            'offer_uz_helper'   => ' ',
            'offer_ru'          => 'Offer Ru',
            'offer_ru_helper'   => ' ',
            'offer_en'          => 'Offer En',
            'offer_en_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'title_uz'          => 'Title Uz',
            'title_uz_helper'   => ' ',
            'title_ru'          => 'Title Ru',
            'title_ru_helper'   => ' ',
            'title_en'          => 'Title En',
            'title_en_helper'   => ' ',
        ],
    ],
    'certificate' => [
        'title'          => 'Certificate',
        'title_singular' => 'Certificate',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'homeDirectionSection' => [
        'title'          => 'Home Direction Section',
        'title_singular' => 'Home Direction Section',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'number'                      => 'Number',
            'number_helper'               => ' ',
            'image'                       => 'Image',
            'image_helper'                => ' ',
            'name_uz'                     => 'Name Uz',
            'name_uz_helper'              => ' ',
            'name_ru'                     => 'Name Ru',
            'name_ru_helper'              => ' ',
            'name_en'                     => 'Name En',
            'name_en_helper'              => ' ',
            'short_description_uz'        => 'Short Description Uz',
            'short_description_uz_helper' => ' ',
            'short_description_ru'        => 'Short Description Ru',
            'short_description_ru_helper' => ' ',
            'short_description_en'        => 'Short Description En',
            'short_description_en_helper' => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
];
