<script setup>
import { onMounted, ref, defineProps, defineEmits } from 'vue';
const emits = defineEmits(['clickLink'])
const props = defineProps({
  links: {
    type: Array,
    required: true
  },
})
const clickLink = (url) => {
  if(url) {
    emits('clickLink', url)
  }
}
</script>

<template>
<div>
  <nav role="navigation" aria-label="ページナビ" class="flex items-center justify-between">
    <div>
      <span class="relative z-0 inline-flex shadow-sm rounded-md">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">

          <template v-for="link in props.links" :key="link.label" >
            <a :class="{'cursor-pointer': link.url}" v-if="!link.active" @click.prevent="clickLink(link.url)" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" v-html="link.label"></a>
            <span :class="{'cursor-pointer': link.url}" v-else @click.prevent="clickLink(link.url)" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" v-html="link.label"></span>
          </template>

        </div>
      </span>
    </div>
  </nav>
</div>
</template>