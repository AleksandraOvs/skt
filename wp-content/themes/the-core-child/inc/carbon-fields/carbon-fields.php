<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{


    Container::make('theme_options', 'Настройки')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-admin-generic')
        ->add_tab(__('Контакты'), array(

            Field::make('text', 'crb_address_label', 'Адрес')
                ->set_width(100),

            Field::make('text', 'crb_phone_label', 'Текст поля телефона')
                ->set_width(50),
            Field::make('text', 'crb_phone_link', 'Ссылка телефона')
                ->set_width(50),

            Field::make('text', 'crb_email_label', 'Текст email')
                ->set_width(50),
            Field::make('text', 'crb_email_link', 'Ссылка email')
                ->set_width(50),


            Field::make('complex', 'messengers', 'Ссылки на контакты')
                ->add_fields(array(

                    Field::make('text', 'crb_mes_name', 'Название')
                        ->set_width(33),

                    Field::make('text', 'crb_mes_link', 'Ссылка на контакт')
                        ->set_width(33),

                    Field::make('image', 'crb_mes_image', 'Иконка контакта')
                        ->set_width(33),

                    Field::make('color', 'crb_contact_background', 'Цвет иконки')
                        ->set_width(33),
                )),

            Field::make('text', 'crb_map_code', 'Код карты'),

            Field::make('text', 'crb_form_shortcode', 'Шорткод для формы обратной связи'),

        ));

    Container::make('post_meta', 'Контент главной страницы')
        ->show_on_page('main-page')
        ->add_tab(__('Первый экран'), array(

            Field::make('image', 'crb_hero_image', 'Изображение для первого экрана(desktop)')
                ->set_width(33),
            Field::make('image', 'crb_hero_image_mob', 'Изображение для первого экрана(mobile)')
                ->set_width(33),
        ))

        ->add_tab(__('Цели'), array(

            Field::make('text', 'crb_purpose', 'Заголовок блока')
                ->set_width(100),
            Field::make('image', 'crb_purpose_img', 'Изображение блока')
                ->set_width(50),
            Field::make('rich_text', 'crb_purpose_text', 'Текстовый блок')
                ->set_width(50),
        ))

        ->add_tab(__('Направления'), array(

            Field::make('text', 'crb_directions', 'Заголовок блока')
                ->set_width(100),
            Field::make('complex', 'crb_directions_list', 'Направления деятельности')
                ->add_fields(array(
                    Field::make('image', 'crb_direction_icon', 'Иконка')
                        ->set_width(33),
                    Field::make('text', 'crb_direction_head', 'Заголовок')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_direction_desc', 'Подзаголовок')
                        ->set_width(33),
                ))
        ))

        ->add_tab(__('Блок вывода записей категории(Проекты)'), array(
            Field::make('text', 'crb_post_types_head', 'Заголовок блока'),
            Field::make('association', 'crb_post_types', 'Категории')
                ->set_width(50)
                ->set_max(1)
                ->set_types([
                    [
                        'type' => 'term',
                        'taxonomy' => 'category',
                    ]
                ])
        ))

        ->add_tab(__('Команда'), array(
            Field::make('text', 'crb_team_head', 'Заголовок блока'),
            Field::make('complex', 'crb_team_list', 'Команда')
                ->add_fields(array(
                    Field::make('image', 'crb_team_photo', 'Фото')
                        ->set_width(33),
                    Field::make('text', 'crb_team_name', 'Имя')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_team_desc', 'Описание')
                        ->set_width(33),
                ))
        ))

        ->add_tab(__('О движении в цифрах'), array(

            Field::make('complex', 'crb_nums_list', 'Цифры')
                ->add_fields(array(
                    Field::make('rich_text', 'crb_num_num', 'Цифра')
                        // ->set_attribute( 'type', 'number' )
                        ->set_width(50),
                    Field::make('rich_text', 'crb_num_desc', 'Описание')
                        ->set_width(50),

                ))
        ))

        ->add_tab(__('Блок Партнеры'), array(
            Field::make('complex', 'crb_partners', 'Блок Парнеры')
                ->add_fields(array(
                    Field::make('image', 'crb_partner_logo', 'Логотип')
                        ->set_width(33),
                    Field::make('text', 'crb_partner_name', 'Название')
                        ->set_width(33),
                    Field::make('text', 'crb_partner_link', 'Ссылка')
                        ->set_width(33),
                ))
        ));

    /* Field for FW-EVENT */

    Container::make('post_meta', 'Дата проведения')
        ->show_on_post_type('fw-event')
        ->add_fields(array(
            Field::make('date', 'crb_event_date', 'Дата проведения')
                ->set_attribute('placeholder', 'Дата')
        ));

    // Container::make('theme_options', 'Общие настройки')
    //     ->set_page_menu_position(2)
    //     ->set_icon('dashicons-admin-generic')
    //     ->add_tab(__('Контакты'), array(
    //         Field::make('complex', 'crb_contact_links', 'Ссылки контактов')
    //             ->add_fields(array(
    //                 Field::make('image', 'crb_contact_link_icon', 'Иконка контактв')
    //                     ->set_width(33),
    //                 Field::make('text', 'crb_contact_link_text', 'Текст контакты')
    //                     ->set_width(33),

    //                 Field::make('text', 'crb_contact_link_link', 'Ссылка контакта')
    //                     ->set_width(33),
    //             )),
    //     ));

    // Container::make('theme_options', 'Контент главной страницы')
    //     ->set_page_menu_position(3)
    //     ->add_tab(__('Слайдер первого экрана'), array(
    //         Field::make('complex', 'hero_slides', 'Слайды')
    //             ->add_fields(array(
    //                 Field::make('image', 'hero_slide_img', 'Изображение')
    //                     ->set_width(20),
    //                 Field::make('text', 'crb_hero_heading', 'Заголовок')
    //                     ->set_width(30),
    //                 Field::make('rich_text', 'crb_hero_description', 'Подзаголовок')
    //                     ->set_width(40)
    //             )),
    //     ))

    //     ->add_tab(__('Второй блок'), array(
    //         Field::make('text', 'crb_second_heading', 'Заголовок')
    //             ->set_width(30),
    //         Field::make('rich_text', 'crb_second_text', 'Текст блока')
    //             ->set_width(40)
    //     ))

    //     ->add_tab(__('Виды устройств'), array(
    //         Field::make('text', 'crb_devices_heading', 'Заголовок')
    //             ->set_width(30),
    //         Field::make('rich_text', 'crb_devices_text', 'Текст блока')
    //             ->set_width(40),
    //         Field::make('complex', 'devices_pics', 'Устройства')
    //             ->set_classes('grid-fields')
    //             ->add_fields(array(
    //                 Field::make('image', 'crb_device_img', 'Изображение'),
    //                 Field::make('text', 'crb_device_heading', 'Заголовок'),
    //             )),
    //     ))

    //     ->add_tab(__('Деятельность'), array(
    //         Field::make('complex', 'crb_activities', 'Виды деятельности')
    //             //->set_classes('grid-fields')
    //             ->add_fields(array(
    //                 Field::make('text', 'crb_act_head', 'Заголовок'),
    //                 Field::make('rich_text', 'crb_act_text', 'Описание'),
    //             )),
    //     ))

    //     ->add_tab(__('Услуги'), array(
    //         Field::make('rich_text', 'crb_servicrs_desc', 'Описание блока'),
    //         Field::make('complex', 'crb_services', 'Услуги')
    //             //->set_classes('grid-fields')
    //             ->add_fields(array(
    //                 Field::make('text', 'crb_service_head', 'Заголовок'),
    //             )),
    //     ))

    //     ->add_tab(__('Блок Партнеры'), array(
    //         Field::make('image', 'crb_partners_background', 'Фон секции'),
    //         Field::make('complex', 'crb_partners', 'Блок Парнеры')
    //             ->add_fields(array(
    //                 Field::make('image', 'crb_partner_logo', 'Логотип'),
    //                 Field::make('text', 'crb_partner_name', 'Название'),
    //                 Field::make('text', 'crb_partner_link', 'Ссылка'),
    //             ))
    //     ));
}
