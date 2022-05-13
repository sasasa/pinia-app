export const getCart = (success, fail) => {
  axios.get('/api/carts')
  .then((response) => {
    console.log(response.data)
    success(response.data)
  })
  .catch(err => {
      console.log({err})
      fail(err)
  });
}
export const createCart = (payload, success, fail) => {
  axios.post('/api/carts', payload)
  .then((response) => {
    console.log(response.data)
    success(response.data)
  })
  .catch(err => {
      console.log({err})
      fail(err)
  });
}