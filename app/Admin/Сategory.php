<?php

    use App\Сategory;
    use SleepingOwl\Admin\Model\ModelConfiguration;

    AdminSection::registerModel(Сategory::class, function (ModelConfiguration $model) {
        $model->setTitle('Категорії');

        // Display
        $model->onDisplay(function () {
            return AdminDisplay::table()->setApply(function ($query) {
                $query->orderBy('place', 'asc');
            })->setColumns([
                AdminColumn::link('title_uk')->setLabel('Заголовок'),
                AdminColumn::text('text_uk')->setLabel('текст'),
            ])->paginate(15);
        });
        $model->onCreateAndEdit(function () {
            // Create And Edit
            $form = AdminForm::panel();
            $form->setItems(
                AdminFormElement::text('place', 'Порядок відображення'),
                AdminFormElement::columns()->addColumn(function () {
                    return [
                        AdminFormElement::text('title_uk', 'Title Uk'),
                        AdminFormElement::textarea('text_uk', 'Text Uk'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::text('title_ru', 'Title Ru'),
                        AdminFormElement::textarea('text_ru', 'Text Ru'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::text('title_en', 'Title En'),
                        AdminFormElement::textarea('text_en', 'Text En'),
                    ];
                })
            );

            $form->getButtons()
                ->setSaveButtonText('Зберегти')
                ->hideSaveAndCloseButton();

            return $form;
        });
    });

