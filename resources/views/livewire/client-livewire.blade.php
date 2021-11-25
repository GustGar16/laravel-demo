<div>
    @if($view == 'index')
        <button type="button" wire:click="add()" class="btn btn-success">Nuevo registro</button>
        <table class="table table-responsive">
            <thead>
                <th>Cod</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>F. Creación</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($clients as $item)
                <tr>
                    <td>{{ $item->cod }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->city->name }}</td>
                    <td>{{ $item->created_at }}</td>
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
                <label>COD:</label>
                <input type="text" class="form-control" wire:model="cod"/>
                @error('cod') <span>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" class="form-control" wire:model="name"/>
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Ciudad:</label>
                <select class="form-control" wire:model="city_id">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
            <button type="button" class="btn btn-primary mt-5" wire:click="save()">Guardar</button>
        </form>
    @endif
</div>