/**
 * @author {Kulik Leonid}
 *
 * @description {
 *
 * }
 */

const TYPE_CREATE = 'create';
const TYPE_EDIT = 'edit';

const IMAGER_TEMPAREA_CLASSNAME = 'imager__temp-area';

class Imager {
    /**
     * @param type Тип инициализируемого модуля. Либо это генерация полей с файлами, которые отправляются вместе с формой
     *  Либо это формирование api запросов для управления файлами на сервере, основываясь на полученной в конструкторе моделе
     * @param params
     */
    constructor(type = TYPE_CREATE, params = {}) {
        this.type = type;
        this.params = params;

        this.rendered = false;
        this.model = undefined;
        this.fileColumnName = undefined;

        this.$imager = undefined;
        this.$imagerItems = undefined;
        this.$tempArea = undefined;

        this.imageIndex = 0;

        this.#setup();
    }

    getTemplate() {
        let itemsTemplate = ``;

        switch (this.type) {
            case TYPE_EDIT: {
                for (let i = 0; i < this.items.length; i++) {
                    itemsTemplate += (`
                        <div class="imager__item" data-row-id="${this.items[i].id}">
                            <img src="/storage/${this.items[i][this.fileColumnName]}" alt="image">

                            <div class="imager__item__actions">
                                <button type="button" class="imager__remove-image-btn btn btn-outline-danger waves-effect waves-light">Удалить</button>
                                <button type="button" class="imager__make-preview-btn btn btn-outline-info waves-effect waves-light">Сделать превью</button>
                            </div>
                        </div>
                    `);
                }

                break;
            }
        }

        return (`
            <div class="imager">
                <div class="imager__controls">
                    <div class="imager__btn imager__add-image-btn btn btn-outline-info waves-effect waves-light">
                        Добавить фотографию
                    </div>
                </div>
                <div class="imager__items">
                    ${itemsTemplate}
                </div>
            </div>
        `);
    }

    #render() {
        $('.imager-container').append(this.getTemplate());
    }

    #setup() {
        if (this.type === TYPE_EDIT) {
            this.fileColumnName = this.params.column;
            this.items = JSON.parse(this.params.items);
        }

        if (!this.rendered) {
            this.#render();
        }

        this.$imager = $('.imager');
        this.$imagerItems = $('.imager__items');
        this.$addImageBtn = $('.imager__add-image-btn');

        this.modules[this.type](this);
    }

    generateTempArea() {
        let template = (`<div class="${IMAGER_TEMPAREA_CLASSNAME}" style="display: none;"></div>`);

        if (this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`).length !== 0) {
            this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`).remove();
        }

        this.$imager.append(template);
        this.$tempArea = this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`);
    }


    modules = {
        create: (context) => {
            function removeImage(imageIndex) {
                let $imageItem = context.$imagerItems.find(`.imager__item[data-index="${imageIndex}"]`);

                $imageItem.off().find("*").off();
                $imageItem.remove();
            }

            function addImage(blob) {
                let index = context.imageIndex;
                let imageItemTemplate = (`
                    <div class="imager__item" data-index="${index}">
                        <img src="${blob}" alt="image">
                        <input type="input" name="files[]" style="display: none;">

                        <div class="imager__item__actions">
                            <button type="button" class="imager__remove-image-btn btn btn-info waves-effect waves-light">Удалить</button>
                        </div>
                    </div>
                `);

                context.$imagerItems.append(imageItemTemplate);

                let $currentItem = context.$imagerItems.find(`.imager__item[data-index="${index}"]`);

                $currentItem.find('input').val(blob);
                $currentItem.find('.imager__remove-image-btn').bind('click', (event) => {
                    event.preventDefault();
                    removeImage(index);
                });

                context.imageIndex++;
            }

            function triggerHiddenFileInput() {
                context.generateTempArea();

                let fileInputTemplate = (`<input class="imager__temp-file-input" type="file" multiple="multiple">`);
                context.$tempArea.append(fileInputTemplate);
                let $fileInput = context.$tempArea.find('.imager__temp-file-input');

                $fileInput.unbind('change');
                $fileInput.bind('change', (event) => {
                    event.preventDefault();

                    let files = $fileInput[0].files;
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        let reader = new FileReader();

                        reader.readAsDataURL(file);
                        reader.onload = () => {
                            let blob = reader.result;
                            addImage(blob);
                        }
                    }
                });

                $fileInput.trigger('click');
            }

            function addImageBtnBinding() {
                context.$addImageBtn.unbind('click');
                context.$addImageBtn.bind('click', (event) => {
                    event.preventDefault();

                    triggerHiddenFileInput();
                });
            }


            addImageBtnBinding();
        },
        edit: (context) => {
            context.model = context.params.model;
            context.column = context.params.column;
            context.entityColumnName = context.params.entityColumnName;
            context.entityColumnValue = context.params.entityColumnValue;
            context.path = context.params.path;

            context.previewModel = context.params.previewModel;
            context.previewColumn = context.params.previewColumn;


            function addImage(fileRow) {
                let imageItemTemplate = (`
                    <div class="imager__item" data-row-id="${fileRow.id}">
                        <img src="/storage/${fileRow[context.fileColumnName]}" alt="image">

                        <div class="imager__item__actions">
                            <button type="button" class="imager__remove-image-btn btn btn-info waves-effect waves-light">Удалить</button>
                        </div>
                    </div>
                `);

                context.$imagerItems.append(imageItemTemplate);
                removeBtnBinding();
            }

            function triggerHiddenFileInput() {
                context.generateTempArea();

                let fileInputTemplate = (`<input class="imager__temp-file-input" type="file" multiple="multiple">`);
                context.$tempArea.append(fileInputTemplate);
                let $fileInput = context.$tempArea.find('.imager__temp-file-input');

                $fileInput.unbind('change');
                $fileInput.bind('change', (event) => {
                    event.preventDefault();

                    let files = $fileInput[0].files;
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        let reader = new FileReader();

                        reader.readAsDataURL(file);
                        reader.onload = () => {
                            let blob = reader.result;

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: `/admin/api/imager/upload`,
                                type: 'post',
                                data: {
                                    model: context.model,
                                    column: context.column,
                                    entityColumnName: context.entityColumnName,
                                    entityColumnValue: context.entityColumnValue,

                                    pathToSave: context.path,
                                    image: blob
                                },
                                beforeSend: () => {},
                                success: (response) => {
                                    addImage(response.data.row);
                                },
                                error: (e) => {
                                    alert('Возникла ошибка при загрузке фотографии');
                                }
                            });
                        }
                    }
                });

                $fileInput.trigger('click');
            }

            function removeBtnBinding() {
                let $removeBtns = context.$imager.find('.imager__remove-image-btn');
                $removeBtns.unbind('click');
                $removeBtns.bind('click', (e) => {
                    e.preventDefault();

                    let $currentItem = $(e.currentTarget).closest('.imager__item');
                    let rowId = $currentItem.data('row-id');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/admin/api/imager/delete`,
                        type: 'post',
                        data: {
                            model: `${context.model}`,
                            rowId: rowId
                        },
                        beforeSend: () => {},
                        success: (response) => {
                            $currentItem.remove();

                            removeBtnBinding();
                        },
                        error: (e) => {
                            alert('Не удалось удалить изображение');
                        }
                    });
                });
            }

            function makePreviewBtnBinding() {
                let $makePreviewBtns = context.$imager.find('.imager__make-preview-btn');
                $makePreviewBtns.unbind('click');
                $makePreviewBtns.bind('click', (e) => {
                    e.preventDefault();

                    let $currentItem = $(e.currentTarget).closest('.imager__item');
                    let rowId = $currentItem.data('row-id');
                    let imageUrl = $currentItem.find('img').attr('src');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/admin/api/imager/set-preview`,
                        type: 'post',
                        data: {
                            model: `${context.previewModel}`,
                            columnName: `${context.previewColumn}`,
                            imageUrl: `${imageUrl}`,
                            id: context.entityColumnValue
                        },
                        beforeSend: () => {},
                        success: (response) => {
                        },
                        error: (e) => {
                            alert('Не удалось установить превью');
                        }
                    });
                });
            }

            function addImageBtnBinding() {
                context.$addImageBtn.unbind('click');
                context.$addImageBtn.bind('click', (event) => {
                    event.preventDefault();

                    triggerHiddenFileInput();
                });
            }


            makePreviewBtnBinding();
            addImageBtnBinding();
            removeBtnBinding();
        }
    };
}
