<div>
    @if($form)
        <form>
            <h2>{{ $form->title }}</h2>
            
            @foreach($form->fields as $field)
                <div>
                    <label>{{ $field['field_title'] }}</label>

                    @if($field['field_type'] === 'text')
                        <input type="text" name="{{ \Str::slug($field['field_title'], '_') }}" />
                    @endif
                </div>
            @endforeach
        </form>
    @else
        <p>No form available.</p>
    @endif

</div>