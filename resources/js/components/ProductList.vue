<script setup>
import { onMounted, ref } from 'vue';
import { storeToRefs } from 'pinia';
import Pagenate from './Pagenate.vue';
import { useStoreProducts } from '../stores/products';
import { useStoreCart } from '../stores/cart';

const { products, is_products_loading, links } = storeToRefs(useStoreProducts());
const { getProducts } = useStoreProducts();

const { addCart } = useStoreCart();

onMounted(() => {
  getProducts();
});
</script>

<template>
  <div v-if="is_products_loading">
    読み込み中です...
  </div>
  <ul v-else class="bg-green-300">
    <li class="p-4" v-for="product in products" v-bind:key="product.id">
      {{ product.title }} - ¥{{ product.price.toLocaleString() }}
      在庫 {{ product.inventory }}
      <button :disabled="!product.inventory" @click="addCart(product)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        カートへ
      </button>
    </li>
  </ul>
  <Pagenate :links="links" @clickLink="(url) => getProducts(url)" />
</template>