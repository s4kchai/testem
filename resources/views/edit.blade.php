<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขรายการรายรับ/รายจ่าย</title>
</head>
<body>
    <h1>แก้ไขรายการรายรับ/รายจ่าย</h1>

   
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('financial-records.update', $record->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="prefix">คำนำหน้าชื่อ:</label>
            <select name="prefix" id="prefix">
                <option value="นาย" {{ $record->prefix === 'นาย' ? 'selected' : '' }}>นาย</option>
                <option value="นาง" {{ $record->prefix === 'นาง' ? 'selected' : '' }}>นาง</option>
                <option value="นางสาว" {{ $record->prefix === 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
            </select>
        </div>

        <div>
            <label for="first_name">ชื่อ:</label>
            <input type="text" name="first_name" id="first_name" value="{{ $record->first_name }}" required>
        </div>

        <div>
            <label for="last_name">นามสกุล:</label>
            <input type="text" name="last_name" id="last_name" value="{{ $record->last_name }}" required>
        </div>

        <div>
            <label for="birthdate">วันเดือนปีเกิด:</label>
            <input type="date" name="birthdate"
