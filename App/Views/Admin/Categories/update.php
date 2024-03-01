@extends('layouts.admin')
@section('content')
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Thumnail</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?= $id ?>
            </td>
            <td>
                <?= $name ?>
            </td>
            <td>
                <?= $description ?>
            </td>
            <td>
                <?= $thumbnail ?>
            </td>
            <td>
                <?= $status ?>
            </td>
        </tr>
    </tbody>
</table>
@endsection