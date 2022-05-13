export const getProducts = (url, success, fail) => {
    // setTimeout(() => cb(_products), 1000);
    url = url || '/api/products'
    axios.get(url)
    .then((response) => {
      console.log(response.data)
      success(response.data)
    })
    .catch(err => {
        console.log({err})
        fail(err)
    });
}