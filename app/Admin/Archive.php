<?php
    use App\Archive;
    use SleepingOwl\Admin\Model\ModelConfiguration;

    AdminSection::registerModel(Archive::class, function (ModelConfiguration $model) {
        $model->setTitle('Архів');

        // Display
        $model->onDisplay(function () {
            return AdminDisplay::table()->setColumns([
                AdminColumn::text('place')->setLabel('Порядок'),
                AdminColumn::link('title_uk')->setLabel('Заголовок'),
                AdminColumn::image('photo_thesis')->setLabel('Тези'),
            ])->paginate(15);
        });

        // Create And Edit
        $model->onCreateAndEdit(function () {
            $form = AdminForm::panel();
            $form->setItems(
                AdminFormElement::text('place', 'Порядок відображення'),
                AdminFormElement::columns()->addColumn(function () {
                    return [
                        AdminFormElement::text('title_uk', 'Заголовок UK'),
                        AdminFormElement::text('title_ru', 'Заголовок RU'),
                        AdminFormElement::text('title_en', 'Заголовок EN'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::image('photo_thesis', 'Фото тез'),
                        AdminFormElement::file('thesis', 'Тези'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::image('photo_img', 'Зображення фотографій'),
                        AdminFormElement::file('img', 'Архів фотографій'),
                    ];
                })
            );


            $form->getButtons()
                ->setSaveButtonText('Зберегти')
                ->hideSaveAndCloseButton();

            return $form;
        });
    });
