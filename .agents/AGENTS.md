# WordPress Theme Development Rules

## 1. ACF Fields Organization
- **Visual Section Alignment**: Do not group input fields into generic/global tabs (like "Contact & Footer" or "General"). Instead, custom fields must be placed exactly under the ACF Tab corresponding to the visual section/screen where they are rendered on the frontend.
  - *Example*: The Contact Card details inside the Intro section must be placed under the "Intro" tab, not in a global tab.

## 2. Framer-to-WordPress React Hydration
- **Preventing Hydration Mismatch**: The homepage template is built on hydrated Framer React components. Do not output PHP tags directly inside hydrated text tags or links, as this will trigger React hydration mismatches and cause elements to disappear or fail to mount.
- **Client-Side Injection**: For dynamic content inside hydrated sections:
  1. Render the original hardcoded HTML structure that React expects.
  2. Embed a JSON script element containing the ACF dynamic values at the end of the template file.
  3. Use JavaScript to target and update those DOM elements client-side after DOMContentLoaded.

## 3. Template Architecture
- **Home Template**: The active homepage template is located in `templates/template-home.php`. The root `page-home.php` has been deactivated and cleared to avoid template registration conflicts.
- **Single File Architecture**: This project is special; all pages/views are unified and loaded inside a single file: `templates/template-home.php`. Do not split logic or views into multiple template files unless explicitly requested.
- **Disabled Editor**: The default WordPress content editor has been disabled for the homepage template using ACF's native `'hide_on_screen' => array('the_content')` configuration parameter to keep the admin interface clean since all inputs are managed through ACF fields.
