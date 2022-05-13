export const createMinusStock = (payload, success, fail) => {
  axios.post('/api/stocks', payload)
  .then((response) => {
    console.log(response.data)
    success(response.data)
  })
  .catch(err => {
      console.log({err})
      fail(err)
  });
}