import os
import re

def check_blade_template(file_path):
    with open(file_path, 'r') as file:
        content = file.read()
        csrf_meta_tag = '<meta name="csrf-token" content="{{ csrf_token() }}">'
        if csrf_meta_tag in content:
            print("Blade template CSRF token is correctly set.")
        else:
            print("Blade template CSRF token is missing. Adding CSRF token meta tag.")
            content = content.replace('</head>', f'{csrf_meta_tag}\n</head>')
            with open(file_path, 'w') as file:
                file.write(content)
            print("CSRF token meta tag added to Blade template.")

def check_javascript(file_path):
    with open(file_path, 'r') as file:
        content = file.read()
        csrf_token_setting = 'const csrfToken = document.querySelector(\'meta[name="csrf-token"]\').getAttribute(\'content\');'
        if csrf_token_setting in content:
            print("JavaScript CSRF token setting is correctly set.")
        else:
            print("JavaScript CSRF token setting is missing. Adding CSRF token setting.")
            pattern = r'xhr\.open\(\'POST\', form\.action, true\);'
            replacement = f"""
            {csrf_token_setting}
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.open('POST', form.action, true);
            """
            content = re.sub(pattern, replacement, content)
            with open(file_path, 'w') as file:
                file.write(content)
            print("CSRF token setting added to JavaScript.")

def check_laravel_middleware(file_path):
    with open(file_path, 'r') as file:
        content = file.read()
        csrf_middleware = '\App\Http\Middleware\VerifyCsrfToken::class'
        if csrf_middleware in content:
            print("Laravel middleware CSRF token verification is correctly set.")
        else:
            print("Laravel middleware CSRF token verification is missing. Adding CSRF middleware.")
            pattern = r'\'web\' => \[([\s\S]*?)\],'
            replacement = r"""
            'web' => [
                \App\Http\Middleware\EncryptCookies::class,
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \App\Http\Middleware\VerifyCsrfToken::class,
            ],
            """
            content = re.sub(pattern, replacement, content)
            with open(file_path, 'w') as file:
                file.write(content)
            print("CSRF middleware added to Laravel middleware configuration.")

def main():
    # 替換成你的實際文件路徑
    blade_template_path = '/home/ec2-user/environment/WIRA_New/resources/views/welcome.blade.php'
    javascript_path = '/home/ec2-user/environment/WIRA_New/public/wirawebflow/addBm.js'
    laravel_middleware_path = '/home/ec2-user/environment/WIRA_New/app/Http/Kernel.php'
    
    check_blade_template(blade_template_path)
    check_javascript(javascript_path)
    check_laravel_middleware(laravel_middleware_path)

if __name__ == "__main__":
    main()
