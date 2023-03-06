<div>
    <input type="checkbox" name="assignSubject" x-model="subjects" value="{{ $subjectId }}" wire:model="checked" wire:change="processAssign()" wire:loading.attr="disabled" x-data>
</div>
