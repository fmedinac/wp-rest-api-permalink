# wp-rest-api-permalink

> It adds the possibility of using `permalink` as query string on WP REST API requests.

The main purpose of this is to get/filter pages using their permalinks. Different from `slug`, it can be used for nested pages.

## Usage

```javascript
fetch( 'https://example.com/wp-json/wp/v2/pages?permalink=team/about');
fetch( 'https://example.com/wp-json/wp/v2/pages?permalink=company/about');
```
