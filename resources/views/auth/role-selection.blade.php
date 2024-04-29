<div class="mt-4" >
            <div class="form-group">
                <x-jet-label for="roles">Role:</x-jet-label>
                <select name="roles[]" id="roles" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
