@csrf
<div class="mb-1 row">
    <div class="col-md-4">
        <label for="entrant[name]" class="col col-form-label">Имя</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[name]',
                'placeholder' => 'Имя абитуриента',
                'value' => $entrant->name ?? ''
            ])
        </div>
    </div>
    <div class="col-md-4">
        <label for="entrant[surname]" class="col col-form-label">Фамилия</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[surname]',
                'placeholder' => 'Фамилия абитуриента',
                'value' => $entrant->surname ?? ''
            ])
        </div>
    </div>
    <div class="col-md-4">
        <label for="entrant[patronymic]" class="col col-form-label">Отчество</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[patronymic]',
                'placeholder' => 'Отчество',
                'value' => $entrant->patronymic ?? ''
            ])
        </div>
    </div>
</div>

<div class="mb-1 row">
    <div class="col-md-4">
        <label for="entrant[phone]" class="col col-form-label">Номер телефона</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[phone]',
                'placeholder' => 'Телефон абитуриента',
                'value' => $entrant->phone ?? ''
            ])
        </div>
    </div>
    <div class="col-md-4">
        <label for="entrant[email]" class="col col-form-label">Email</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[email]',
                'placeholder' => 'Email',
                'value' => $entrant->email ?? ''
            ])
        </div>
    </div>
    <div class="col-md-4">
        <label class="col col-form-label">Дата рождения</label>
        <div class="input-group" id="datepicker2">
            <input type="text" class="form-control" placeholder="dd.mm.yyyy"
                   data-date-format="dd.mm.yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                   data-date-autoclose="true" name="entrant[birthdate]">
            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
        </div>
    </div>
</div>

<div class="mb-1 row">
    <div class="col-md-4">
        <label class="col col-form-label">Укажите гражданство</label>
        <select class="form-control select2" name="entrant[citizenship]">
            <option value="-1" selected>Не указано</option>
            @foreach ($citizenshipList as $citizen)
                <option value="{{ $citizen }}">{{ $citizen }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="entrant[passport_number]" class="col col-form-label">Серия и номер паспорта</label>
        <div class="col">
            @include('admin.components.forms.input', [
                'name' => 'entrant[passport_number]',
                'placeholder' => 'Серия и номер',
                'value' => $entrant->passport_number ?? ''
            ])
        </div>
    </div>
</div>
