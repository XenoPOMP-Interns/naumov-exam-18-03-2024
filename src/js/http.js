/**
 * Возвращает GET параметр по ключю.
 * @param name
 * @return {string}
 */
function get(name) {
  if (
    (name = new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)').exec(
      location.search
    ))
  )
    return decodeURIComponent(name[1]);
}
