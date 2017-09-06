<?php
    use App\Confinfo;
    use SleepingOwl\Admin\Model\ModelConfiguration;

    AdminSection::registerModel(Confinfo::class, function (ModelConfiguration $model) {
        $model->setTitle('Інформація');

        // Display
        $model->onDisplay(function () {
            return AdminDisplay::table()->setColumns([
                AdminColumn::text('place')->setLabel('Порядок')->setWidth('100px'),
                AdminColumn::link('text_uk')->setLabel('Текст')->setWidth('400px'),
            ])->paginate(15);
        });

        // Create And Edit
        $model->onCreateAndEdit(function () {
            // Create And Edit
            $form = AdminForm::panel();
            $form->setItems(
                AdminFormElement::text('place', 'Порядок відображення'),
                AdminFormElement::columns()->addColumn(function () {
                    return [
                        AdminFormElement::ckeditor('text_uk', 'Text Uk'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::ckeditor('text_en', 'Text En'),
                    ];
                })->addColumn(function () {
                    return [
                        AdminFormElement::ckeditor('text_ru', 'Text Ru'),
                    ];
                })
            );

            $form->getButtons()
                ->setSaveButtonText('Зберегти')
                ->hideSaveAndCloseButton();

            return $form;
        });
    });