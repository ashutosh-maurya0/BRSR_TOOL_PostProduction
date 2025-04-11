# BRSR XBRL Generator

This Node.js script connects to a MySQL database, retrieves data based on a provided CIN (Corporate Identification Number), and generates an XBRL XML file using the retrieved data.

---

## 📁 Project Structure

- `index.js` – Main script to generate the XBRL file
- `xbrl_output.xbrl` – Output file generated after script execution

---

## 🛠️ Prerequisites

### ✅ 1. Install Node.js and npm

Make sure you have Node.js and npm installed. You can download and install them from:

👉 [https://nodejs.org/](https://nodejs.org/)

To verify installation, run:

```bash
node -v
npm -v

## Install Required npm Packages
npm install mysql xmlbuilder