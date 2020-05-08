@component('elcoop:datatable::component')
    @slot('delete', true)
    @slot('buttons')
        <a class="button is-info" href="{{action('Admin\PostController@showNew')}}">أضف</a>
    @endslot
    <div class="title is-7 has-text-centered">
        @if($withEditLink ?? true)
            <component :is="object.id ? 'a' : 'div'"
                       :href="object.id ? `{{Request::url() }}/${object.id}` : '#'">
                <span class="is-size-3" v-text="object.name || '{{ $createTitle ?? 'Create'}}'"></span>
                <font-awesome-icon icon="link" v-if="object.id"></font-awesome-icon>
            </component>
        @else
            <div>
							<span class="is-size-3"
                                  v-text="object.name || object.name_{{\App::getLocale()}} ||'{{ $createTitle ?? 'Create'}}'"></span>
            </div>
        @endif
    </div>
    @isset($extraSlotViews)
        @foreach($extraSlotViews as $extraSlotView)
            @include($extraSlotView)
        @endforeach
    @endisset
@endcomponent