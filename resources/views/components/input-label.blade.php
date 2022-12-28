@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-right text-sm text-gray-700']) }}>
  {{ $value ?? $slot }}
</label>
