
import re
import os
import unicodedata
import Image
from hashlib import md5

def hash(afile, blocksize=65536):
    hasher = md5()
    buf = afile.read(blocksize)
    while len(buf) > 0:
        hasher.update(buf)
        buf = afile.read(blocksize)
    return hasher.hexdigest()

def to_url(value, separator='-'):
    """Converts a string into an url-safe representation."""
    if type(value) is not unicode:
        value = unicode(value)
    value = re.sub('\+', ' mas ', value)
    value = re.sub('/+', separator, value)
    value = unicodedata.normalize('NFKD', value).encode('ascii', 'ignore')
    value = unicode(re.sub('[^\w\s-]', '', value).strip().lower())
    return re.sub('[-\s]+', separator, value)


def thumbnail(image, dimensions, destination):
    original = image
    image = Image.open(image)
    
    target_w, target_h = map(int, dimensions.split('x'))
    actual_w, actual_h = image.size
    if actual_w < target_w or actual_h < target_h:
        actual_size = 'x'.join([str(s) for s in image.size])
        print 'The given image "%s" is %s, it must be at least %s' % (os.path.basename(original), actual_size, dimensions)
    elif actual_w >= target_w or actual_h >= target_w:
        t = image.copy()
        if image.mode not in ('L', 'RGB'):
            image = image.convert('RGB')
        t.thumbnail((target_w, target_h), Image.ANTIALIAS)
        t.save(destination, 'JPEG')
        print destination, 'saved'


def main():
    src = '/Users/ernesto/Code/Freelance/cvmeals/fotos/'
    dst = '/Users/ernesto/Code/Freelance/cvmeals/resized_pics'

    imgs = []
    for dirname, _, filenames in os.walk(src):
        for filename in filenames:
            if filename.lower().split('.')[-1] not in ['jpg', 'jpeg']:
                continue

            path = os.path.join(dirname, filename)
            img = Image.open(path)
            
            if img.size[0] >= 950:
                new_path = to_url(path.replace(src, '').replace(filename, ''))[:-1]
                if os.path.exists(new_path):
                    print new_path, 'EXISTS'
                    continue
                checksum = hash(open(path))
                thumbnail(path, '950x950', os.path.join(dst, '%s-%s.jpg' % (new_path, checksum)))
                thumbnail(path, '85x85', os.path.join(dst, '%s-%s-thumb.jpg' % (new_path, checksum)))

try:
    main()
except IOError, e:
    print e