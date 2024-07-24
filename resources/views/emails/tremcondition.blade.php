<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      h1 {
        font-size: 30px;
        font-weight: 800;
        line-height: 36px;
        letter-spacing: 2px;
      }
      p {
        line-height: 1.625;
        font-size: 16px;
        letter-spacing: 0;
        color: #202124;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .text_app {
        font-size: 28px;
        list-style: 36px;
        font-weight: 600;
        color: #000;
      }
      .srcn-conatiner {
        width: 90%;
        max-width: 1366px;
        margin: 0 auto;
      }
      .header_box {
        z-index: 50px;
        position: fixed;
        left: 0;
        width: 100%;
      }
      .unscrolled {
        background-color: #fff;
        color: #000;
        padding: 10px;
        width: 100%;
        box-shadow: 0 10px 14px #4469f324;
      }

      .img_box {
        display: flex;
        align-items: center;
      }

      .img_box img {
        width: 80px;
        height: auto;
        margin-right: 10px;
      }

      section.section_text {
        display: block;
        padding-top: 102px;
      }

      .d-row.row-container {
        display: grid;
      }
      .text_oft {
        font-weight: 600;
        font-size: 20px;
        margin-right: 9px;
      }

      h2 {
        font-size: 20px;
        margin-top: 20px;
      }

      a {
        color: #007bff;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <header class="header_box">
      <section class="unscrolled">
        <div class="srcn-conatiner">
          <div class="row">
            <nav class="">
              <div class="img_box">
             
				<img src="{{asset('resume/playstore.png')}}" />
                <span class="text_app">Google App</span>
              </div>
            </nav>
          </div>
        </div>
      </section>
    </header>
    <section class="section_text">
      <div class="srcn-conatiner">
        <div class="d-row row-container">
          <h1>Good Will Online Store - Terms and Conditions</h1>
          <div class="text">
            <h2><span class="text_oft">1</span>Acceptance of Terms</h2>
            <p>
              Welcome to Good Will Online Store
              <a href="#">(the "Platform"),</a> operated by Topseed Technology
              ("we," "us," or "our"). By accessing or using our Platform, you
              agree to comply with and be bound by these Terms and Conditions
              <a href="#">("Terms")</a>. If you do not agree to these Terms,
              please do not use our Platform.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">2</span> Use of the Platform</h2>
            <p>
              You may use our Platform for personal, non-commercial purposes
              only.
            </p>
            <p>
              You are responsible for maintaining the confidentiality of your
              account credentials.
            </p>
            <p>
              You agree not to use the Platform for any illegal or unauthorized
              purpose.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">3</span>User Accounts</h2>
            <p>
              WTo access certain features of the Platform, you may need to
              create an account.
            </p>
            <p>
              You are responsible for all activities that occur under your
              account.
            </p>
            <p>
              We reserve the right to terminate or suspend accounts for
              violations of these Terms.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">4</span>Buying and Selling</h2>
            <p>
              The Platform facilitates buying and selling of goods. Buyers and
              sellers are responsible for their transactions.
            </p>
            <p>
              Sellers must accurately represent products, including pricing and
              availability.
            </p>
            <p>
              Buyers must provide accurate payment and shipping information.
            </p>
            <p>
              Disputes between buyers and sellers should be resolved according
              to our dispute resolution process.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">5</span>Intellectual Property</h2>
            <p>
              All content, logos, and trademarks on the Platform are the
              property of Topseed Technology. You may not use our intellectual
              property without our written consent.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">6</span> Privacy Policy</h2>
            <p>
              Your use of the Platform is also governed by our Privacy Policy,
              which explains how we collect, use, and protect your data.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">7</span> Dispute Resolution</h2>
            <p>
              Any disputes arising from your use of the Platform shall be
              resolved according to our dispute resolution process.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">8</span> Termination of Services</h2>
            <p>
              We reserve the right to terminate or suspend access to the
              Platform for any violation of these Terms or for any other reason,
              at our sole discretion.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">9</span> Updates and Modifications</h2>
            <p>
              We may update, modify, or change these Terms from time to time. We
              will notify you of significant changes.
            </p>
            <p>
              Continued use of the Platform after changes indicates acceptance
              of the revised Terms.
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">10</span> Contact Information</h2>
            <p>
              If you have questions or concerns regarding these Terms or the
              Platform, please contact us at:
            </p>
            <!-- <div class="goodwill_form">
              <h3>Topseed Technology</h3>
            </div> -->
          </div>
          <div class="text">
            <h2><span class="text_oft">11</span> Legal Jurisdiction</h2>
            <p>
              These Terms are governed by and construed in accordance with the
              laws of [Insert Jurisdiction]. Any legal action arising from these
              Terms shall be resolved in the courts of [Insert Jurisdiction].
            </p>
          </div>
          <div class="text">
            <h2><span class="text_oft">12</span>Closing Statement</h2>
            <p>
              These Terms constitute the entire agreement between you and
              Topseed Technology regarding the use of Good Will Online Store. By
              using the Platform, you acknowledge that you have read and agreed
              to these Terms.
            </p>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
