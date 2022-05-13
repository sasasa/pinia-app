import { defineStore } from 'pinia';
import { getProducts } from '../api/shop.js';
import { createMinusStock } from '../api/stocks.js';

export const useStoreProducts = defineStore('products', {
  state: () => ({
    products: [],
    links: [],
    is_products_loading: false,
    is_decrement_loading: false,
  }),
  actions: {
    getProducts(url) {
      this.is_products_loading = true
      getProducts(url, (data) => {
        this.products = data.data
        this.links = data.links
        this.is_products_loading = false
      }, (data) => {
        this.is_products_loading = false
        alert('データの取得に失敗しました。')
      });
    },
    decrementInventory(productId) {
      const product = this.products.find((product) => product.id === productId);
      this.is_decrement_loading = true
      createMinusStock({
        product_id: productId,
        quantity: 1,
      }, (data) => {
        this.is_decrement_loading = false
        product.inventory--
      }, (data) => {
        this.is_decrement_loading = false
        alert('カートに入れるのを失敗しました。')
      })
      
    },
  },
});

