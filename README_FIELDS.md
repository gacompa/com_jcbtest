# JCB! Fields

### What Are Fields?
Fields are the **foundation** of every Joomla Component Builder (JCB) project.

They define how data is **stored**, **validated**, **rendered**, and **interacted with** in your Joomla extensions.

Fields let you control everything from the **underlying database schema** to the **user interface**, all within a single configuration.

Each Field:
- Defines **database structure** (type, size, default, null, unique keys, indexes)
- Binds to a **fieldtype**, determining HTML rendering and behavior
- Supports per-field **custom PHP** for model saving and retrieval
- Allows styling and scripting (HTML attributes, JS, CSS)
- Automatically generates Joomla-compliant XML field definitions

### Where Are Fields Used in JCB?
Fields are universal integrated — they are used in, highly structured areas:

- ✅ **Admin Views** (the native Joomla back-end editing views)
- ✅ **Modules** (frontend display configurations)
- ✅ **Plugins** (event-driven integrations)
- ✅ **Component Configurations** (global parameter settings)

### What Can a Field Do?
A Field in JCB can define:

- **Database Type & Schema**: `int`, `varchar`, `json`, custom, nullable, defaults, indexes
- **Permissions**: who can view/edit the field (ACL)
- **Rendering Options**: HTML classes, labels, JS behaviors
- **Model Integration**: how the value is saved or retrieved
- **Dynamic Logic**: PHP hooks for `onGet`, `onSave`, `onPrepareForm`, etc.
- **Fieldtypes**: link to rich behaviors like Model Selects, Subforms, Toggle Switches, Encrypted Fields, etc.

This centralization makes field management efficient and highly reusable.

### Reuse and Sharing
Fields are standalone entities:

- Define once, **reuse across multiple Admin Views**, Modules, or Plugins
- Fields can also be exported and shared via repositories
- JCB will automatically adjust them to fit into each consuming context

This means less duplication, and greater consistency across your entire component structure.

### Versioning and Customization
To update a field:

- Click **"reset"** in the JCB UI to sync with this repository
- Or **fork** this repository, customize the field, and point JCB to your fork

This preserves version control while allowing your own field improvements to live independently.

>Fields define both structure and behavior — they are where your data comes alive.

---
### Index of Fields


 - **1 stop** | [Details](src/field/934eb37b-0fb1-4fed-b3ec-969cd0b364ee) | [Settings](src/field/934eb37b-0fb1-4fed-b3ec-969cd0b364ee/item.json)
 - **2 stop** | [Details](src/field/4a87c014-04ca-4986-8aea-43ed407ff07a) | [Settings](src/field/4a87c014-04ca-4986-8aea-43ed407ff07a/item.json)
 - **3 stop** | [Details](src/field/f68fdba1-62f1-4396-b915-cacc79206db5) | [Settings](src/field/f68fdba1-62f1-4396-b915-cacc79206db5/item.json)
 - **Date (required)** | [Details](src/field/03995043-13fb-4ec7-bc66-e13434425a06) | [Settings](src/field/03995043-13fb-4ec7-bc66-e13434425a06/item.json)
 - **Group** | [Details](src/field/0d4a5caa-2199-4fb1-b07f-bd8071d71dbe) | [Settings](src/field/0d4a5caa-2199-4fb1-b07f-bd8071d71dbe/item.json)
 - **Latitude (decimal)** | [Details](src/field/b83771c3-ffd1-4827-a41d-a633873517c7) | [Settings](src/field/b83771c3-ffd1-4827-a41d-a633873517c7/item.json)
 - **Longitude (decimal)** | [Details](src/field/2c6061d1-eb07-4f29-858b-21e4439b237b) | [Settings](src/field/2c6061d1-eb07-4f29-858b-21e4439b237b/item.json)
 - **Name** | [Details](src/field/ea8871b6-4f71-480b-bbd7-0d71322c6464) | [Settings](src/field/ea8871b6-4f71-480b-bbd7-0d71322c6464/item.json)
 - **Short Description** | [Details](src/field/c9896d41-82cf-42da-873f-2b7c59e22b81) | [Settings](src/field/c9896d41-82cf-42da-873f-2b7c59e22b81/item.json)

### All used in [Joomla Component Builder](https://www.joomlacomponentbuilder.com) - [Source](https://git.vdm.dev/joomla/Component-Builder) - [Mirror](https://github.com/vdm-io/Joomla-Component-Builder) - [Download](https://git.vdm.dev/joomla/pkg-component-builder/releases)

---
[![Joomla Volunteer Portal](https://img.shields.io/badge/-Joomla-gold?logo=joomla)](https://volunteers.joomla.org/joomlers/1396-llewellyn-van-der-merwe "Join Llewellyn on the Joomla Volunteer Portal: Shaping the Future Together!") [![Octoleo](https://img.shields.io/badge/-Octoleo-black?logo=linux)](https://git.vdm.dev/octoleo "--quiet") [![Llewellyn](https://img.shields.io/badge/-Llewellyn-ffffff?logo=gitea)](https://git.vdm.dev/Llewellyn "Collaborate and Innovate with Llewellyn on Git: Building a Better Code Future!") [![Telegram](https://img.shields.io/badge/-Telegram-blue?logo=telegram)](https://t.me/Joomla_component_builder "Join Llewellyn and the Community on Telegram: Building Joomla Components Together!") [![Mastodon](https://img.shields.io/badge/-Mastodon-9e9eec?logo=mastodon)](https://joomla.social/@llewellyn "Connect and Engage with Llewellyn on Joomla Social: Empowering Communities, One Post at a Time!") [![X (Twitter)](https://img.shields.io/badge/-X-black?logo=x)](https://x.com/llewellynvdm "Join the Conversation with Llewellyn on X: Where Ideas Take Flight!") [![GitHub](https://img.shields.io/badge/-GitHub-181717?logo=github)](https://github.com/Llewellynvdm "Build, Innovate, and Thrive with Llewellyn on GitHub: Turning Ideas into Impact!") [![YouTube](https://img.shields.io/badge/-YouTube-ff0000?logo=youtube)](https://www.youtube.com/@OctoYou "Explore, Learn, and Create with Llewellyn on YouTube: Your Gateway to Inspiration!") [![n8n](https://img.shields.io/badge/-n8n-black?logo=n8n)](https://n8n.io/creators/octoleo "Effortless Automation and Impactful Workflows with Llewellyn on n8n!") [![Docker Hub](https://img.shields.io/badge/-Docker-grey?logo=docker)](https://hub.docker.com/u/llewellyn "Llewellyn on Docker: Containerize Your Creativity!") [![Open Collective](https://img.shields.io/badge/-Donate-green?logo=opencollective)](https://opencollective.com/joomla-component-builder "Donate towards JCB: Help Llewellyn financially so he can continue developing this great tool!") [![GPG Key](https://img.shields.io/badge/-GPG-blue?logo=gnupg)](https://git.vdm.dev/Llewellyn/gpg "Unlock Trust and Security with Llewellyn's GPG Key: Your Gateway to Verified Connections!")