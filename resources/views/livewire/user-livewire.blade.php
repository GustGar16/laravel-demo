<div>
    @if($view == 'index')
        <button type="button" wire:click="add()" class="btn btn-success">Nuevo registro</button>
        <table class="table table-responsive">
            <thead>
                <th>Nombre</th>
                <th>Email</th>
                <th>F. Creación</th>
                <th>Usuario Verificado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ ($item->email_verified_at) ? 'Si' : 'No' }}</td>
                    <td>
                        <button type="button" class="btn btn-info" wire:click="edit({{ $item->id }})">Editar</button>
                        <button type="button" class="btn btn-danger" wire:click="delete({{ $item->id }})">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <button type="button" wire:click="table()" class="btn btn-success">Registros</button>
        <form>
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" class="form-control" wire:model="name"/>
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" wire:model="email"/>
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" wire:model="password"/>
                @error('password') <span>{{ $message }}</span> @enderror
            </div>
            <button type="button" class="btn btn-primary mt-5" wire:click="save()">Guardar</button>
        </form>
    @endif
</div>