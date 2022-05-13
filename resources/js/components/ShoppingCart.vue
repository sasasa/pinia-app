<script setup>
import { onMounted, ref } from 'vue';
import { storeToRefs } from 'pinia';
import { useStoreCart } from '../stores/cart';

const { items, total } = storeToRefs(useStoreCart());
const { getCart } = useStoreCart();
onMounted(() => {
  getCart();
});
</script>

<template>
  <h2 class="my-4">カートの中身</h2>
  <p v-if="!items.length"><i>カートに商品は入っていません。</i></p>
  <ul v-else class="bg-yellow-300">
    <li class="py-4" v-for="item in items" :key="item.id">
      {{ item.title }} - ¥{{ item.price.toLocaleString() }} x
      {{ item.quantity }}
    </li>
  </ul>
  <h3 class="bg-red-300">合計金額:¥{{ total.toLocaleString() }}</h3>
</template>