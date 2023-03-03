<div class="w-full">
    <table class="w-full rounded-custom">
        <thead>
          <tr style="background: #F0F1F1;">
            <th class="px-2 py-1 text-left">NAME</th>
            <th class="px-2 py-1 text-left">ENGLISH</th>
            <th class="px-2 py-1 text-left">ESPAÑOL</th>
            <th class="px-2 py-1 text-left">DEUTSCH</th>
            <th class="px-2 py-1 text-left">FRANÇAIS</th>
            <th class="px-2 py-1 text-left">ITALIANO</th>
            <th class="px-2 py-1 text-left">DANSK</th>
          </tr>
        </thead>
        <tbody class="text-xs bg-white">
            @if (count($translations))
                @foreach ($translations as $translation)
                    <tr @if($loop->iteration % 2 == 0) style="background: #FBFBFB;" @endif>
                        <td class="px-2 py-2 text-left cursor-pointer" style="color: #9013FE" wire:click="$emit('openTranslationModal','{{ json_encode($translation) }}')">
                            {!! $this->checkForKeyword($translation->full_key) !!}
                        </td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->en) !!}</td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->es ?? $translation->text->en) !!}</td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->de ?? $translation->text->en) !!}</td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->fr ?? $translation->text->en) !!}</td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->it ?? $translation->text->en) !!}</td>
                        <td class="px-2 py-2 text-left">{!! $this->checkForKeyword($translation->text->da ?? $translation->text->en) !!}</td>
                    </tr>
                @endforeach
            @else
                <tr><td class="py-2 text-center" colspan="7">No results</td></tr>
            @endif

        </tbody>
      </table>
</div>
